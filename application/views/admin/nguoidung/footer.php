<!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 &copy; FlatLab by Kelvin Lee.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <script type="text/javascript" language="javascript" src="<?=base_url()?>static/admin/assets/advanced-datatable/media/js/jquery.js"></script>
    <script src="<?=base_url()?>static/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>static/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url()?>static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>static/admin/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>static/admin/js/respond.min.js" ></script>
    <script src="<?=base_url()?>static/admin/js/form-validation-script.js"></script>        

    <!--common script for all pages-->
    <script src="<?=base_url()?>static/admin/js/common-scripts.js"></script>
    

      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              } );
          } );
      </script>

  </body>
</html>
