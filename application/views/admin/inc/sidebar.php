<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url().'uploads/nophoto.jpg';?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>Ahsan</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <!-- <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li> -->

      <li class="treeview">
              <a href="#" style="text-decoration:none">
                <i class="fa fa-files-o"></i>
                <span >School Profile</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a id="chart" class = "ayam" href = "<?php echo base_url();?>Teacher/Load_SchoolProfile"><i class="fa fa-circle-o"></i>Teacher & Student</a></li>
                <li><a id="subject" class = "ayam" href = "<?php echo base_url();?>Teacher/Load_Subjek"><i class="fa fa-circle-o"></i>Subject of Year</a></li>
                <li><a id="activity" class = "ayam" href = "<?php echo base_url();?>Teacher/Load_Activity"><i class="fa fa-circle-o"></i>Activities</a></li>
                <li><a id="notes" class = "ayam" href = "<?php echo base_url();?>Teacher/load_Notes"><i class="fa fa-circle-o"></i>Notes</a></li>
           
              </ul>
            </li>

            <li class="treeview">
              <a href="#" style="text-decoration:none">
                <i class="fa fa-users"></i>
                <span >Registration</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li>
                <a id="teacher" class = "ayam" href="<?php echo base_url();?>Teacher/Load_Teacher"><i class="fa fa-circle-o"></i>Teacher
                </a>
              </li>
              <li>
                <a id="student" class = "ayam" href="<?php echo base_url();?>Student/Load_Student"><i class="fa fa-circle-o"></i>Student
                </a>
              </li>
            </ul>
          </li>

           

      <!-- <li>
        <a id="activity" class = "ayam" href="<?php echo base_url();?>Teacher/Load_Activity"><i class="fa fa-users"></i>Activities
        </a>
      </li>

      <li>
        <a id="notes" class = "ayam" href="<?php echo base_url();?>Teacher/load_Notes"><i class="fa fa-user-md"></i>Notes
        </a>
      </li> -->

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<script type="text/javascript">


  $(document).on('click','.ayam',function(){

   var href = $(this).attr('href');
   $('#haha').empty().load(href).fadeIn('slow');
   return false;

 });


</script>






<script type="text/javascript">

  $('.apam').removeClass('active');

</script>


<script>


  $(document).ready(function(){

    $( "body" ).on( "click", ".ayam", function() {

      $('.ayam').each(function(a){
       $( this ).removeClass('selectedclass')
     });
      $( this ).addClass('selectedclass');
    });

  })

</script>

<style type="text/css">


  li a.selectedclass
  {
    color: red !important;
    font-weight: bold;
  }

</style>