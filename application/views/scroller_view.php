
<!--Scroller Start-->
<div class="container-fluid">
    <div class="scroller">
      <?php
        echo '<ul>';
        $images = glob("./users/jacob/default/*.jpg");
        foreach($images as $image)
        {
          echo '<li><img src="'.$image.'"></li>';
        }
        echo '</ul>';
      ?>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $(function(){
          $("div.scroller").carousel({loop:true, autoSlide:true, autoSlideInterval:5000});
        });
      });
    </script>
</div>
<!--End of Scroller-->

