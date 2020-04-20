</div>
  <div class="footer">
      <div class="float-right">
          Powered by <strong>Web Infotech</strong>
      </div>
  </div>
</div>
</div>

  <!-- Mainly scripts -->
  <script src="{{asset('kala/src/js/jquery-3.1.1.min.js')}}"></script>
  <script src="{{asset('kala/src/js/popper.min.js')}}"></script>
  <script src="{{asset('kala/src/js/bootstrap.js')}}"></script>
  <script type="text/javascript">

      var cururl = window.location.pathname;

      var curpage = cururl.substr(cururl.lastIndexOf('/') + 1);
      var hash = window.location.hash.substr(1);

      if((curpage == "" || curpage == "/" || curpage == "admin") && hash=="")
      {
      //$("nav .navbar-nav > li:first-child").addClass("active");
      }
      else
      {
          $( '#side-menu' ).find( 'li.active' ).addClass( 'special_link' );
          $( '#side-menu' ).find( 'li.active' ).removeClass( 'active' );

          if(hash != ""){           
              $("#side-menu li a[href*='"+hash+"']").parents("li").addClass("active");
              $("#side-menu li a[href*='"+hash+"']").parents("li").removeClass("special_link");
          }
          else{
              $("#side-menu li a[href*='"+curpage+"']").parents("li").addClass("active");
              $( '#side-menu' ).find( 'li.active' ).removeClass( 'special_link' );
          }
      
      }
  </script>
</body>
</html>