ThinkPHP 5.0
===============
####[Doctrine](http://www.doctrine-project.org/)
####[var-dumper](https://symfony.com/doc/current/components/var_dumper.html)

####Doctrine 例子
```$xslt

<?php
// application/entity/Product.php

/**
 * @Entity
 */
class Product
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $name;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name
    }
    
    public function setName($name)
    {
        $this->name = $name
    }
    
}
```
>定义好了Product.php文件，需要在命令界面输入
>vendor/bin/doctrine orm:schema-tool:update --force --dump-sql命令，该命令会自动生成数据库，数据表，表字段


####Doctrine 使用
```$xslt
<?php
//application/index/Index.php

use app\entity\Product;
use think\Controller;

class Index extend Controller
{
    public function index()
    {
        $product = new Product;
        
        $product->setName('Robert');
        
        $em = $this->getEntityManger();
        $em->persist($product);
        $em->flush();
        
        return 'Id: ' . $product->getId();
    }
}
```


