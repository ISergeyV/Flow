<?php

namespace App;

use DOMDocument;

class getProduct
{

    protected $xml;

    const FILE_CATALOG = __DIR__ . '/../assets/productCatalog.php';

    public array $product
        = [
            [
                'material' => '',
                'product' => '',
                'imageURL' => '',
            ],
        ];

    /**
     * Load products from xml file.
     */
    public function __construct()
    {
        if (file_exists(self::FILE_CATALOG)) {
            if (date("Y-m-d") >= date("Y-m-d",
                    strtotime("+3 days", filemtime(self::FILE_CATALOG)))
            ) {
                $this->generate_new_unique_array_product();
            } else {
                $this->product = require(self::FILE_CATALOG);
            }
        } else {
            // Если файла с массивом продуктов нет, создаем его
            $this->generate_new_unique_array_product();
        }

    }

    public function generate_new_unique_array_product()
    {
        $this->xml = new DOMDocument('1.0');
        $this->xml->load(__DIR__ . '/../assets/productCatalog_1.xml');
        if (!$this->xml) {
            echo "XML load error!";
            exit();
        }

        $wolf = simplexml_import_dom($this->xml);

        foreach ($wolf->products->product as $key => $val) {
            // Если элементы разные, добавляем элемент как уникальный в масив класса Продукт
            if (strcasecmp($val->product, end($this->product)['product'])) {
                $val_arr = (array)$val;
                //Если значение элемента пустое, пропускаем его
                foreach ($val_arr as $key_arr => $var_arr_var) {
                    if (empty($var_arr_var)) {
                        unset($val_arr[$key_arr]);
                        continue;
                    }
                }
                $this->product[] = $val_arr;
            }
        }
        array_shift($this->product);
        file_put_contents(self::FILE_CATALOG,
            '<?php' . PHP_EOL . 'return ' . var_export($this->product, true)
            . ';');
        //		var_dump( $this->product );
        $this->saveImages();
    }

    public function saveImages()
    {
        foreach ($this->product as $index => $item) {

            // Создаем путь и имя файла
            $file = __DIR__ . '/../assets/img/' . basename($item['imageURL']);

            // Меняем файл на локальный
            $this->product[$index]['imageURL'] = '/assets/img/'
                . basename($item['imageURL']);

            if (file_exists($file)) {
                continue;
            }

            file_put_contents($file, file_get_contents($item['imageURL']));
        }
    }

    /**
     * @param string $name
     * @param string $url
     *
     * @return string
     */
    public static function tagA(string $name, string $url): string
    {
        return '<a href="' . $url . '">' . $name . '</a>';
    }

}
