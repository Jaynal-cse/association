<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
   @if(Request::is('admin*'))
   <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
		<a href="{{ route('admin.dashboard') }}">
			<i class="icon-th"></i>
			<span>Dashboard</span>
		</a>							
	</li>
	<li class="{{ Request::is('admin/registration') ? 'active' : '' }}">
		<a href="{{ route('admin.registration.index') }}">
		    <i class="icon-tags"></i>
		    <span>Registration</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
		<a href="{{ route('admin.tag.index') }}">
			<i class="icon-tags"></i>
			<span>Section & Designation</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
		<a href="{{ route('admin.category.index') }}">
			<i class="icon-tags"></i>
			<span>Category</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
		<a href="{{ route('admin.user.index') }}">
			<i class="icon-tags"></i>
			<span>User</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/personel*') ? 'active' : '' }}">
		<a href="{{ route('admin.personel.index') }}">
		   <i class="icon-tags"></i>
		   <span>Personnel</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
		<a href="{{ route('admin.post.index') }}">
		   <i class="icon-tags"></i>
		   <span>Posts</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
		<a href="{{ route('admin.slider.index') }}">
		   <i class="icon-tags"></i>
		   <span>Sliders</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/gallery*') ? 'active' : '' }}">
		<a href="{{ route('admin.gallery.index') }}">
		   <i class="icon-tags"></i>
		   <span>Gallery</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/video*') ? 'active' : '' }}">
		<a href="{{ route('admin.video.index') }}">
		   <i class="icon-tags"></i>
		   <span>Video</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/service*') ? 'active' : '' }}">
		<a href="{{ route('admin.service.index') }}">
		   <i class="icon-tags"></i>
		   <span>About Us</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
		<a href="{{ route('admin.contact.index') }}">
		   <i class="icon-tags"></i>
		   <span>Message</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/notice*') ? 'active' : '' }}">
		<a href="{{ route('admin.notice.index') }}">
		   <i class="icon-tags"></i>
		   <span>Notice Board</span>
		</a>
	</li>
	<li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
		<a href="{{ route('admin.subscriber.index') }}">
		    <i class="icon-tags"></i>
		    <span>Subscribers</span>
		</a>
	</li>
	
    @endif
	
	@if(Request::is('author*'))
	<li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
							<a href="{{ route('author.dashboard') }}">
								<i class="icon icon-home"></i>
								<span>Dashboard</span>
							</a>
	</li>
	<li class="{{ Request::is('author/post*') ? 'active' : '' }}">
		<a href="{{ route('author.post.index') }}">
		   <i class="icon-tags"></i>
		   <span>Posts</span>
		</a>
	</li>
	@endif
    

    
    <li class="content"> <span>Taday's Enrollemnt</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Last 10 day's Enrollment</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
	 <li class="content"> <span>Current Month Enrollment</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->