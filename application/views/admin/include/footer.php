  
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
    <?php if($subpage=='user-manage'||$subpage=='rating-manage'||$subpage=='comment-manage'||$subpage=='news-manage'||$subpage=='order-manage'||$subpage=='invoice-manage'||$subpage=='product-manage'||$subpage=='product-import-manage'||$subpage=='rating-info'||$subpage=='news-comment')
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
    <?php if($subpage=='user-add'||$subpage=='user-edit'||$subpage=='rating-edit'||$subpage=='comment-edit'||$subpage=='news-add'||$subpage=='news-edit'||$subpage=='order-add'||$subpage=='product-edit'||$subpage=='product-import'||$subpage=='news-comment-edit')
        echo '        
    <script src="'.base_url().'static/admin/js/jquery.js"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>
    <script src="'.base_url().'static/admin/assets/fuelux/js/spinner.min.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/jquery-multi-select/js/jquery.quicksearch.js" type="text/javascript"></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>    
    <script src="'.base_url().'static/admin/js/advanced-form-components.js"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
    ';
    
    if($subpage=='product-add')
        echo '        
    <script src="'.base_url().'static/admin/js/jquery.js"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>
    <script src="'.base_url().'static/admin/assets/fuelux/js/spinner.min.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/assets/jquery-multi-select/js/jquery.quicksearch.js" type="text/javascript"></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>    
    <script src="'.base_url().'static/admin/js/form-component.js"></script>    
    <script src="'.base_url().'static/admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
    ';
    if($subpage=='news-add'||$subpage=='news-edit')
        echo '<script type="text/javascript" src="'.base_url().'static/admin/assets/ckeditor/ckeditor.js"></script>';
    ?>
    <?php if($subpage=='order-edit'||$subpage=='invoice-info'||$subpage=='product-import-info')
        echo '
    <script src="'.base_url().'static/admin/js/jquery.js"></script>
    <script src="'.base_url().'static/admin/js/bootstrap.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="'.base_url().'static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="'.base_url().'static/admin/js/respond.min.js" ></script>    
    <script src="'.base_url().'static/admin/js/common-scripts.js"></script>
    ';
    ?>    
  </body>
</html>
