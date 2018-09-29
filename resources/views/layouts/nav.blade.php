<style>
    /*start carousel and navigation*/



    /*end carousel and navigation*/
</style>

  <!--START HEADER -->

      <div class="container-fluid" id="headerid">

        <div class="container">

          <nav class="row justify-content-between">

              <span class="greet-text nav-link text-white text-center" href="#"
              class="mr-auto">Welcome To My Shop</span>

              <ul class="nav">
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                </li> -->
                <form action="{{ url('/search') }}" method="GET">
                  {{ csrf_field() }}
                  <div class="input-group mt-2">
                    <input type="text" name="search" placeholder="search here" class="rounded-0">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>
                </form>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Member</a>
                  @if(!Auth::check())
                    <ul class="dropdown-menu" id="dm">
                      <li class="dropdown-item">
                        <a href="register">Register</a>
                      </li>
                      <li class="dropdown-item">
                        <a href="/login">Login</a>
                      </li>
                    </ul>
                  @else
                    <ul class="dropdown-menu" id="dm">
                      <li class="dropdown-item">
                        <a href="/logout">Logout</a></li>
                    </ul>
                  @endif
                </li>
                <li class="dropdown-item">
                  <a href="/dashboard"><i class="fa fa-unlock"></i></a>
                </li>
                @if(\Auth::check())
                <li class="nav-item">
                  <?php $user_id = \Auth::user()->id; ?>
                  <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-cart-plus"></i>
                  <span class="badge-danger badge-pill">
                    {{ Cart::count() }}
                  </span>
                  </a>
                </li>
                <li class="nav-item">
                  <?php $user_id = \Auth::user()->id; ?>
                  <a class="nav-link" href="{{ route('wishlist.index') }}"><i class="fa fa-heart"></i>
                  <span class="badge-danger badge-pill">
                    {{ Cart::instance('wishlist')->count() }}
                  </span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <?php $name = \Auth::user()->name; ?>
                  <a href="">{{ $name }}</a>
                </li>
                  <?php
                    $user = \Auth::user();
                    $role_id = \DB::table('role_users')
                    ->where('user_id', $user->id)->value('role_id');
                    $role = \DB::table('roles')->where('id', $role_id)->value('name');
                  ?>
                  @if($user->is_admin == 1 || $role == 'Service Provider' || $role == 'Human Resource')
                    <li class="nav-item pt-2 pl-5">
                      <?php $name = \Auth::user()->name; ?>
                      <a href="{{ url('/dashboard') }}"> <i class="fa fa-unlock"></i>Dashboard</a>
                    </li>
                  @endif
                @endif
              </ul>

          </nav>

        </div>

      </div>

      <!-- END HEADER -->


  <!-- START NAVIGATION -->

  <div class="container-fluid" id="navid">
    <div class="container">
      <nav class="row navbar navbar-inverse navbar-toggleable-sm">
        <button class="mt-3 navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a href="#" class="navbar-brand nav-brand">Brand</a>

        <div class="collapse row justify-content-between navbar-collapse navigation" id="myNav">
          <!-- <a href="#">Libran</a> -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ url('/home') }}" class="nav-link">Home</a>
            </li>
            <?php
              use App\CategoryType;
              $categorytypes = CategoryType::all();
            ?>
            @foreach($categorytypes as $categorytype)
              <?php
                $name = Illuminate\Support\Facades\Crypt::encrypt($categorytype->name);
              ?>
              <li class="nav-item">
                <a href="{{ url('categorytype/' . $name) }}" class="nav-link">{{ $categorytype->name }}</a>
              </li>
            @endforeach
            <li class="nav-item">
              <a href="{{ route('about') }}" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
            </li>
          </ul>

        </div>

      </nav>

    </div>
  </div>

  <!-- END NAVIGATION -->
