  
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 &copy; FlatPC by Kelvin Lee.
              <a title="Về đầu trang" href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section> 
    <?php if($page=='dashboard')
        echo '
    <script src="'.base_url().'static/admin/js/jquery.js"></script>
    <script src="'.base_url().'static/admin/js/jquery-1.8.3.min.js"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="'.base_url().'static/admin/js/owl.carousel.js" ></script>
    <script src="'.base_url().'static/admin/js/jquery.customSelect.min.js" ></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>    
    <script src="'.base_url().'static/admin/js/sparkline-chart.js"></script>
    <script src="'.base_url().'static/admin/js/easy-pie-chart.js"></script>
    <script src="'.base_url().'static/admin/js/count.js"></script>

    <script>

        //owl carousel

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
          autoPlay:true

            });
        });

        //custom select box

        $(function(){
            $(\'select.styled\').customSelect();
        });

    </script>
    '
    ?>
    <?php if($subpage=='user-manage')
        echo '        
    <script src="'.base_url().'static/admin/assets/advanced-datatable/media/js/jquery.js" type="text/javascript" language="javascript"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/advanced-datatable/media/js/jquery.dataTables.js" type="text/javascript" language="javascript"></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $(\'#example\').dataTable( {
                "aaSorting": [[ 4, "desc" ]]
            } );
        } );
    </script>
    '
    ?>
    <?php if($subpage=='user-add')
        echo '    
    <script src="'.base_url().'static/admin/js/jquery.js"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>    
    <script src="'.base_url().'static/admin/js/bootstrap-switch.js"></script>    
    <script src="'.base_url().'static/admin/js/jquery.tagsinput.js"></script>
    <script src="'.base_url().'static/admin/js/ga.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>
    <script src="'.base_url().'static/admin/js/form-component.js"></script>
    '
    ?>
  </body>
</html>