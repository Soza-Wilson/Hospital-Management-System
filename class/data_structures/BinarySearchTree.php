<?php

class Tree
{
    public $data, $left, $right;
    public function __construct($data)
    {
        $this->data = $data;
        $this->left;
        $this->right;
    }


    public function add_child($value)
    {

        if ($value == $this->data) {
            return;
        } else if ($value < $this->data) {
            if (!empty($this->left)) {
                $this->left->add_child($value);
            } else {
                $this->left = new Tree($value);
            }
        } else if ($value > $this->data) {

            if (!empty($this->right)) {
                $this->right->add_child($value);
            } else {

                $this->right = new Tree($value);
            }
        }
    }


    public function in_order_tranvesal():array
    {
        $out_put = [];
        if (!empty($this->left)) {
            array_push($out_put, $this->left->in_order_tranvesal());
        }
        array_push($out_put,$this->data);

        if (!empty($this->right)) {
            array_push($out_put, $this->in_order_tranvesal());
        }

        return $out_put;
    }
}

class Build_tree
{
    private $tree;
    public function __construct(array $values_array)
    {
        $this->tree = new Tree($values_array[0]);
        for ($i = 0; $i < sizeof($values_array); $i++) {
            $this->tree->add_child($values_array[$i]);
        }
    }

    public function in_order_tranvesal():array
    {
        return $this->tree->in_order_tranvesal();   
    }
}
