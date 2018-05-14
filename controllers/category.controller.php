<?php

class CategoryController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model= new Newss();
    }

    public function list()
    {
        $params = App::getRoutes()->getParams();

        if (isset($params)) {
            $id = $params[0];
            $this->data['category'] = array_reverse($this->model->getCategoryById($id));
        } else {
            $this->data['category_list'] = $this->model->getCategoryList();
        }
    }

    public function analytics()
    {
        $page = 0;
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }

        $this->data['category_analytics'] = $this->model->getAnalyticsByPage($page);
        $this->data['data_analytics'] = $this->model->getAnalyticsData();
    }
}