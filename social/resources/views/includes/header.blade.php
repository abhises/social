<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
 @if(Auth::user())
 <h4>Welcome {{Auth::user()->first_name}}</h4>
 @else
  <a class="navbar-brand" href="{{route('welcome')}}">Social</a>
  @endif

 
  <hr>



  
  
        
        @if(Auth::user())
        <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle"  data-toggle="dropdown">Hello {{Auth::user()->first_name}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
   
    <li><a href="{{route('post.index')}}">Dashboard</a></li>
    <li><a href="{{route('profile')}}">Profile</a></li>
     <li><a href="{{route('logout')}}">Logout</a></li>

    
    
  </ul>
</div>
        @endif
      
 
</nav>

</header>