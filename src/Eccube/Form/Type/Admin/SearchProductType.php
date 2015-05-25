<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


namespace Eccube\Form\Type\Admin;

use \Symfony\Component\Form\AbstractType;
use \Symfony\Component\Form\Extension\Core\Type;
use \Symfony\Component\Form\FormBuilderInterface;
use \Symfony\Component\Validator\Constraints as Assert;

class SearchProductType extends AbstractType
{
    public $app;

    public function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $app = $this->app;

        $builder
            ->add('id', 'integer', array(
                'label' => '商品ID',
                'required' => false,
                'constraints' => array(
                    new Assert\Type(array(
                        'type' => 'integer',
                    )),
                ),
            ))
            ->add('code', 'text', array(
                'label' => '商品コード',
                'required' => false,
            ))
            ->add('name', 'text', array(
                'label' => '商品名',
                'required' => false,
            ))
            ->add('category_id', 'category', array(
                'label' => 'カテゴリ',
                'empty_value' => '選択してください',
                'required' => false,
            ))
            ->add('status', 'disp', array(
                'label' => '種別',
                'multiple'=> true,
                'required' => false,
            ))
            ->add('product_status', 'status', array(
                'label' => '商品ステータス',
                'multiple'=> true,
                'required' => false,
            ))
            ->add('register_start', 'date', array(
                'label' => '登録・更新日',
                'required' => false,
                'input' => 'datetime',
                'widget' => 'choice',
                'format' => 'yyyy-MM-dd',
                'empty_value' => array('year' => '----', 'month' => '--', 'day' => '--'),
            ))
            ->add('register_end', 'date', array(
                'label' => '登録・更新日',
                'required' => false,
                'input' => 'datetime',
                'widget' => 'choice',
                'format' => 'yyyy-MM-dd',
                'empty_value' => array('year' => '----', 'month' => '--', 'day' => '--'),
            ))
            ->add('pageno', 'hidden', array(
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'admin_search_product';
    }
}
