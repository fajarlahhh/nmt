<!-- begin #sidebar -->

<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <a href="javascript:;" data-toggle="nav-profile">
          <div class="cover with-shadow"></div>
          <div class="info">
            <b class="caret pull-right"></b>
            {{ auth()->user()->name }}
          </div>
        </a>
      </li>
      <li>
        <ul class="nav nav-profile">
          <li><a href="javascript:;" class="btn-help"><i class="fa fa-question-circle"></i> Help</a></li>
        </ul>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">
      <li class="nav-header">Navigation</li>
      @php
        $currentUrl = '/' . Request::path();

        foreach (config('menu.' . (auth()->user()->role == 0 ? 'admin' : 'member')) as $menu) {
            $GLOBALS['parent_active'] = '';
            $active = strpos($currentUrl, $menu['url']) === 0 ? 'active' : '';
            $active = empty($active) && !empty($GLOBALS['parent_active']) ? 'active' : $active;
            echo '
       <li class="'. $active .'"><a href="' .
        ($menu['url'] == 'javascript:;' ? 'javascript:;' : url($menu['url'])) .
        '"><i class="'.$menu['icon'].'"></i>' .
                $menu['title'] .
                '</li>
      ';
        }
      @endphp
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
