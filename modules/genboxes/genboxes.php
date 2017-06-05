<?php

if(!defined('_PS_VERSION_'))
    exit;

class GenBoxes extends Module {

    public function __construct()
    {
        $this->name = 'genboxes';
        $this->tab  = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'groupe5';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Gestion Boxes');
        $this->description = $this->l('Créer vos propres boxes personnalisées!!');
        $this->confirmUninstall = $this->l('Etes vous certain de vouloir désinstaller ce module :( ?');

    }

    // Se lance à l'installation  du modules
    public function install() {
        if(!parent::install() || !$this->registerHook('top'))
            return false;

        $this->installDB();
        return true;
    }

    //Se lance à la desintallation du modules
    public function uninstall() {
        if(!parent::uninstall())
            return false;

        $this->removeDB();
        return true;
    }

    /**
     * Création des Tables boxes & boxes_product
     */
    private function installDB()
    {

        //Create Table boxes
        $createBoxes = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."boxes`(
	    `id_box` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	    `name` VARCHAR(256) NOT NULL,
        `description` VARCHAR(256) NOT NULL );";

        //Create Table link boxes - product
        $createBoxes_Product ="CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."boxes_product`(
			`id_box` INT(10)  NOT NULL,
			`id_product` INT(10) UNSIGNED NOT NULL,
			FOREIGN KEY (id_box) REFERENCES ps_boxes(id_box),
            FOREIGN KEY (id_product) REFERENCES ps_product(id_product)
			);";

        Db::getInstance()->Execute($createBoxes);
        Db::getInstance()->Execute($createBoxes_Product);
    }

    /**
     * Suppression des tables boxes & boxes_product
     */
    private function removeDB() {
        $dropTable = "DROP TABLE "._DB_PREFIX_."boxes_product; DROP TABLE "._DB_PREFIX_."boxes";
        Db::getInstance()->Execute($dropTable);
    }

    public function getContent()
    {
        $output = null;

        // Dans le cas d'une edition d'une box
        if (Tools::isSubmit('submitEditBox')) {
            $output .= $this->saveEditBoxForm();
        } else if (Tools::isSubmit('updategenboxes')) {
            return $this->renderFormBox(false);
        }

        // Dans le cas d'une suppression d'une box
        if (Tools::isSubmit('deletegenboxes')) {
            if ($_GET['id_product']) {
                $result = Db::getInstance()->delete('boxes_product', 'id_product = '. $_GET['id_product'] .' AND id_box = '. $_GET['id_box'], 1);
                if ($result) {
                    $output .= $this->displayConfirmation('Le produit a été supprimé avec succès');
                } else {
                    $output .= $this->displayError('Impossible de supprimer ce produit ...');
                }
                return $output . $this->renderAddButton('addProduct', $_GET['id_box']) . $this->renderListProduct(); 
            }
            $result = Db::getInstance()->delete('boxes', 'id_box = '. $_GET['id_box'], 1);
            if ($result) {
                $output .= $this->displayConfirmation('La box a été supprimée avec succès');
            } else {
                $output .= $this->displayError('Impossible de supprimer cette Box car elle contient des produits');
            }
        }

        // Pour accéder au produit contenant une box
        if (Tools::isSubmit('viewgenboxes')) {
            if ($_GET['id_product']) {
                Tools::redirect('index.php?id_product='. $_GET['id_product'] .'&controller=product');
            }
            return $this->renderAddButton('addProduct', $_GET['id_box']) . $this->renderListProduct();
        }

        // Ajout d'une box
        if (Tools::isSubmit('submitAddBox')) {
            $output .= $this->saveAddBoxForm();
        } else if (Tools::isSubmit('addBox')) {
            return $this->renderFormBox();
        }

        // Pour ajouter des produits à une box
        if (Tools::isSubmit('submitAddProduct')) {
            $output .= $this->saveAddProductForm();
            return $output . $this->renderAddButton('addProduct', $_GET['id_box']) . $this->renderListProduct();
        } else if (Tools::isSubmit('addProduct')) {
            return $this->renderFormProduct();
        }

        return $output . $this->renderAddButton('addBox') . $this->renderListBox();
    }

    public function renderListBox()
    {
        $sql = 'SELECT b.*, count(bp.id_product) as nb_product FROM '. _DB_PREFIX_ .'boxes as b LEFT JOIN '. _DB_PREFIX_ .'boxes_product as bp ON bp.id_box = b.id_box GROUP BY b.id_box';

        if ($result = Db::getInstance()->ExecuteS($sql))
        {
            $this->fields_list = array(
                'id_box' => array(
                    'title' => 'ID',
                    'width' => 'auto',
                    'type' => 'text'
                ),
                'name' => array(
                    'title' => $this->l('Nom de la box'),
                    'width' => 'auto',
                    'type' => 'text'
                ),
                'description' => array(
                    'title' => $this->l('Description de la box'),
                    'width' => 'auto',
                    'type' => 'text'
                ),
                'nb_product' => array(
                    'title' => $this->l('Nombre de produits'),
                    'width' => 'auto',
                    'type' => 'text'
                )
            );

            $helper = new HelperList();
            $helper->simple_header = true;
            $helper->identifier = 'id_box';
            $helper->actions = array('view', 'edit', 'delete');
            $helper->title = 'Liste des boxes';
            $helper->table = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
            return $helper->generateList($result, $this->fields_list);
        }

        return '<h2>Aucune Box trouvée</h2><br><p>Cliquez sur le bouton de droite pour ajouter une Box</p>';
    }

    public function renderAddButton($about, $idBox = 0)
    {
        $this->context->smarty->assign(
            array(
                'link' => $this->context->link,
                'about' => $about,
                'idBox' => $idBox
            )
        );

        return $this->display(__FILE__, 'addButton.tpl');
    }

    public function renderFormBox($add = true)
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => ($add) ? $this->l('Ajouter une box') : $this->l('Editer une box'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Nom de la box'),
                        'name' => 'name',
                        'size' => 50,
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Description de la box'),
                        'name' => 'description',
                        'size' => 50,
                        'required' => true
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->submit_action = ($add) ? 'submitAddBox' : 'submitEditBox';   
        
        return $helper->generateForm(array($fields_form));
    }

    public function renderFormProduct()
    {
        // récupère tous les produits
        $products = Product::getProducts($this->context->language->id, 0, 100, 'id_product', 'DESC');
        $products_all = Product::getProductsProperties($this->context->language->id, $products);

        // Ajoutes les produits au select du formulaire
        $options = array();
        foreach ($products_all as $key => $product) {
            array_push($options,
                array(
                    'id_option' => $product['id_product'],
                    'name' => $product['name']
                )
            );
        }

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => 'Ajouter un produit',
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Produit à ajouter'),
                        'name' => 'product',
                        'required' => true,
                        'options' => array(
                            'query' => $options,
                            'id' => 'id_option',
                            'name' => 'name',
                        )
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'id_box',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->fields_value['id_box'] = $_GET['id_box'];
        $helper->submit_action = 'submitAddProduct';   
        
        return $helper->generateForm(array($fields_form));
    }

    public function renderListProduct()
    {
        $sql = 'SELECT pl.name, bp.id_product FROM '. _DB_PREFIX_ .'boxes_product as bp 
        LEFT JOIN '. _DB_PREFIX_ .'boxes as b ON b.id_box = bp.id_box
        LEFT JOIN '. _DB_PREFIX_ .'product_lang as pl ON pl.id_product = bp.id_product
        WHERE bp.id_box = '. $_GET['id_box'];

        if ($result = Db::getInstance()->ExecuteS($sql))
        {
            $this->fields_list = array(
                'id_product' => array(
                    'title' => 'ID',
                    'width' => 'auto',
                    'type' => 'text'
                ),
                'name' => array(
                    'title' => $this->l('Description'),
                    'width' => 'auto',
                    'type' => 'text'
                )
            );

            $helper = new HelperList();
            $helper->simple_header = true;
            $helper->identifier = 'id_product';
            $helper->actions = array('view', 'delete');
            $helper->title = 'Produit de la box ID : '. $_GET['id_box'];
            $helper->table = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name.'&id_box='. $_GET['id_box'];
            return $helper->generateList($result, $this->fields_list);
        }

        return '<h2>Aucun produit dans cette box</h2><br><p>Cliquez sur le bouton de droite pour ajouter un produit à votre box</p>';
    }

    public function saveAddBoxForm()
    {
        $result = Db::getInstance()->insert('boxes', array(
            'name' => addslashes($_POST['name']),
            'description' => addslashes($_POST['description'])
        ));

        if ($result) {
            $output .= $this->displayConfirmation('La Box a été ajouté avec succès');
        } else {
            $output .= $this->displayError('Erreur dans l\'ajout de la box');
        }

        return $output;
    }

    public function saveEditBoxForm()
    {
        $result = Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'boxes` SET name = \''. addslashes($_POST['name']) .'\', description = \''. addslashes($_POST['description']) .'\' WHERE id_box = '. $_GET['id_box']);

        if ($result) {
            $output .= $this->displayConfirmation('La Box a été édité avec succès');
        } else {
            $output .= $this->displayError('Erreur dans l\'édition de la box');
        }

        return $output;
    }

    public function saveAddProductForm()
    {
        $result = Db::getInstance()->insert('boxes_product', array(
            'id_box' => addslashes($_POST['id_box']),
            'id_product' => addslashes($_POST['product'])
        ));

        if ($result) {
            $output .= $this->displayConfirmation('Le produit a été ajouté avec succès à la box');
        } else {
            $output .= $this->displayError('Erreur dans l\'ajout du produit de la box');
        }

        return $output;
    }

    public function hookDisplayTop($params)
    {
        // Récupération de toutes les box
        $query = "SELECT * FROM `"._DB_PREFIX_."boxes`;";
        $boxes = Db::getInstance()->ExecuteS($query);

        $boxesProduct = [];

        foreach ($boxes as $key => $box) {

            $sql = 'SELECT pl.name, pl.link_rewrite, bp.id_product, pl.id_lang FROM '. _DB_PREFIX_ .'boxes_product as bp 
            LEFT JOIN '. _DB_PREFIX_ .'boxes as b ON b.id_box = bp.id_box
            LEFT JOIN '. _DB_PREFIX_ .'product_lang as pl ON pl.id_product = bp.id_product
            WHERE bp.id_box = '. $box['id_box'];

            $result = Db::getInstance()->ExecuteS($sql);

            // Ajoute le lien de l'image au tableau
            foreach ($result as $key => $value) {

                $images = Image::getImages($value['id_lang'], $value['id_product']);
                $id_image = Product::getCover($value['id_product']);
                // get Image by id
                if (sizeof($id_image) > 0)
                 {
                 $image = new Image($id_image['id_image']);
                 // get image full URL
                 $image_url = _THEME_PROD_DIR_.$image->getExistingImgPath()."-small_default.jpg";
                 }

                $value['url'] = $image_url;
                array_push($result, $value);
            }
            
            $result = array_slice($result, count($result) / 2, count($result));

            $boxesProduct[$box['name'] . '|'. $box['description']] = $result;
            
        }

        // Envoi des box à la vue
        $this->context->smarty->assign(array(
            'boxes' => $boxesProduct
        ));
        return $this->display(__FILE__, 'genboxes.tpl');
    }

}