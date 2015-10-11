	<?= $this->Html->script('jquery-1.11.3.min') ?>
	<?= $this->Html->script('jquery.datetimepicker') ?>
	<?= $this->Html->script('bootstrap.min') ?>
	<?= $this->Html->script('morphext.min') ?>
<script type="text/javascript">
var count = 200;
$(document).ready(function(){
	$('#message1').on('show.bs.modal',
		function(){
			$('#applyButton1').modal('hide');
			
		});
$('#confirm1').on('show.bs.modal',
		function(){
			$('#applyButton1').modal('hide');
			
		});
$('#sent').on('show.bs.modal',
		function(){
			$('#message1').modal('hide');
			
		});
$('#popup').on('hide.bs.modal',
		function(){
			$('#messagebox').val(null);
			$('#chars').text(200);
			
		});		
$('#messagebox').on('keydown', function(){
	$('#chars').text(count - $(this).val().length);
})		
            $("#js-rotating").Morphext({
                animation: "bounceIn",
				speed:5000,
                complete: function () {
                    console.log("This is called after a phrase is animated in! Current phrase index: " + this.index);
                }
            });
			$("#js-desc").Morphext({
                animation: "bounceIn",
				separator:"|", 
				speed:5000,
                complete: function () {
                    console.log("This is called after a phrase is animated in! Current phrase index: " + this.index);
                }
            });
	$('#start,input[name="end"]').datetimepicker({format:'Y-m-d H:i:s'});
	$('.chat').click(function(event){
		var targetUrl = $(this).attr('data-url');
		var user 	= <?php echo isset($authUser['id'])?$authUser['id']:0;?>;
		<?php  echo "\r\n"; ?>
		if(user==0 || user == "" || user==null){
			$('#popuperr1').modal('show');
		}else{
		$.ajax({
			type:"get",
			url:targetUrl,
			success: function(data,textStatus,xhr){
				var obj = JSON.parse(data);
				$('#popup #job').html(obj.title);
				$("#popup #jobtitle").val(obj.title);
				$('#popup #jobs_id').val(obj.id);
				$('#popup #receivers_id').val(obj.hirers_id);
				$('#popup #senders_id').val(user);
					if(user == obj.hirers_id){
						$('#popuperr2').modal('show');
					}else{
						$('#popup').modal('show');
					}
			},
			error: function(e){
					alert("There is an error! "+e);
					console.log(e);
			}
		});
		}
	});
});
</script>