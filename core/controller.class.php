<?php

class Controller
{
    protected $data;

    protected $model;

    protected $params;

    public function __construct($data = array())
    {
        $this->data = $data;
        $this->params = App::getRoutes()->getParams();
    }

    public function getData()
    {
        $promotion = new Model();
        $id = isset($_POST['promotion_id']) ? $_POST['promotion_id'] : null;
        $this->data['promotion'] = $promotion->getPromotion($id);
        $this->data['config'] = $promotion->admin_color();

        $this->model = new User();
        $this->data['admin_role'] = $this->model->getUsersByRole();

        $this->model = new Newss();
        $this->data['categories_roster'] = $this->model->getCategoryList();

        $this->model = new Setting();
        $menuItems = $this->model->getMenu();

        $sortKeyMenuItems = array();
        foreach ($menuItems as $key => $value) {
            $sortKeyMenuItems[$key + 1] = $value;
        }

        $this->data['menu'] = $this->getTree($sortKeyMenuItems);

        return $this->data;
    }

    public function getTree($data)
    {
        $tree = array();

        foreach ($data as $id => &$value) {
            if (!$value['id_parent']) {   // Если нет вложенности
                $tree[$id] = &$value;
            } else {                      // Если есть потомки, то перебираем массив
                $data[$value['id_parent']]['children'][$id] = &$value;
            }
        }

        return $tree;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getParams()
    {
        return $this->params;
    }
}