<div class="row mb-3">
    <div class="col-sm-12"><h4>Cari Kos</h4></div>
    <div class="col-sm-3">
    <form action="datacoba.php" method="post">
        <div class="form-group form-inline">
            <label>Cari Disini</label>
            <select name="s_jurusan" id="s_jurusan" class="form-control">
            	<option value=""></option>
                <option value="Terdekat">Wilayah</option>
                <option value="Harga">Harga</option>
                <option value="Jenis Kos">Jenis Kos</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-inline">
            <label>Keyword</label>
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
        </div>
    </div>
    <div class="col-sm-4">
        <button id="search" name="search" class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
    </div>
    </form>
</div>
 
<div class="data"></div>
<!-- 
<script type="text/javascript">
	$(document).ready(function(){
	    $('.data').load("data_kos.php");
	    $("#search").click(function(){
	    	var Harga = $("#s_harga").val();
	    	var keyword = $("#s_keyword").val();
	    	$.ajax({
	            type: 'POST',
	            url: "data_kos.php",
	            data: {Harga: Harga, keyword:keyword},
	            success: function(hasil) {
	                $('data_kos').html(hasil);
	            }
	        });
	    });
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.data').load("datakos.php");
	    $("#search").click(function(){
	    	var jurusan = $("#s_jurusan").val();
	    	var keyword = $("#s_keyword").val();
	    	$.ajax({
	            type: 'POST',
	            url: "data_kos.php",
	            data: {Harga: Harga, keyword:keyword},
	            success: function(hasil) {
	                $('data_kos').html(hasil);
	            }
	        });
	    });
	});
</script> -->