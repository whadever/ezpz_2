<div class="row">
	<div class="col-xs-2"></div>
        <div class="col-xs-8">
            <select id="example">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>


        </div>
        <div class="col-xs-2"></div>
</div>

<script src="<?php echo base_url() ?>js/jquery.barrating.min.js"></script>

<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'bars-reversed'
      });
   });
</script>