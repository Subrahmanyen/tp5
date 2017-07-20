<?php
namespace app\index\controller;

use think\Controller;
use app\entity\Product;

class Index extends Controller
{
    public function index()
    {
        $product = new Product;
        $product->setName('韩良');
        $em = $this->getEntityManage();
        $em->persist($product);
        $em->flush();
        return '插入最后的ID ' . $product->getId();

    }

    public function test()
    {
        $product = new Product;
        $product->setName('韩华');
        $em = $this->getEntityManage();
        $em->persist($product);
        $em->flush();
        return '插入最后的ID ' . $product->getId();
    }
}
