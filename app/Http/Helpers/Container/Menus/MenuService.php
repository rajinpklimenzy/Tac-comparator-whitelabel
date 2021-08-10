<?php
namespace App\Http\Helpers\Container\Menus;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Nav;

class MenuService {

    protected $menus = [];
    protected $routes = [];
    protected $compiled = null;
  
    public function __construct() {
       
    }
    
    public function addMenu($title, $icon = 'fa fa-user', $callback,  $route = '#', $type = 'resource' ,$badge = false, $id = null) {
        
        $id = empty($id) ? str_slug($title) :  str_slug($id);
    
        $this->menus[$id] = [
            'title'     => $title,
            'icon'      => $icon,
            'route'     => $route,
            'type'      => $type,
            'badge'      => $badge,
            'callback'  => $callback,
        ];
        return $this;
    }
    
    public function addSubMenu($title, $route = '#', $icon = null,$routeParams =[], $badge = false) {

        $this->menuItems->push([
            'title' => $title,
            'icon' => $icon,
            'route' => $route,
            'href' => Nav::getUrlLink($route,$routeParams),
            'badge' => $badge,
        ]);
        
        $this->routes[$route] = $title; 
    }
    
    public function cache($name = null){
        $this->compiled = $this->render($name);
    }

    public function render($template = '', $params = [] ,$name = null) {
        $html = '';
 
        if ($name == null) {
            foreach ($this->menus as $menu => $data) {
                $html .= $this->renderMenu($menu,$template);
            }
            $container = Nav::MENU_CONTAINER;
            if (isset($container[$template])) {
                $params = array_merge($params, ['content' => new HtmlString($html)]);
                $html = \View::make($container[$template], $params)->render();
            }
        } else {
            $name = str_slug($name);
            $html = $this->renderMenu($name,$template);
           
        }
       
        $this->clear();
        return new HtmlString($html);
    }
    
    
    public function clear(){
            $this->menus = [];
       
    }
    

    private function renderMenu($name, $template = '') {
        $template = empty($template) ? Nav::TEMPLATE_LEFT_MENU: $template ;
        $submenus = $this->generate($name);
        
        
        $title  = $this->menus[$name]['title'];
        $route  = $this->menus[$name]['route'];
        $type   = $this->menus[$name]['type'];
        $icon   = $this->menus[$name]['icon'];
        $badge  = $this->menus[$name]['badge'];

        $activeClass = nav::getActiveClass($route, $type);
        $href = 'javascript:;';
        if ($type == 'route') {
            $href = Nav::getUrlLink($route);
        }

        switch ($type) {
            case 'section':
                $render = compact('submenus', 'title');
                return \View::make('helpers.navigation.section',$render )->render();

            default:
                $render = compact('submenus', 'title', 'route', 'type','activeClass','href','icon','badge','name');
                return \View::make($template,$render )->render();
        }


    }

    protected function generate($name) {
        try {
            return $this->generateSubmenu($this->menus, $name);
        } catch (\Exception $ex) {
            die($ex->getMessage());
            return new Collection();
        }
    }
    
    
    
    public function generateSubmenu($callback, $name) {
        $this->menuItems = new Collection;
        $this->call($name);
        return $this->menuItems;
    }

    protected function call($name) {
       
        if (!isset($this->menus[$name])) {
            throw new Exception("Menu not found with name \"{$name}\"");
        }
        if(empty($this->menus[$name]['callback']) == false){
             $this->menus[$name]['callback']($this);
        }
    }
    
    function getRouteTitle($route){
        return isset($this->routes[$route]) ?  $this->routes[$route] :'';
    }
  


}
