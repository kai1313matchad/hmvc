	<script>
		$(document).ready(function(){
			// var kategori = $('[name="kategori"]').val();
			// var location = $('[name="location"]').val();
			// var size = $('[name="size"]').val();
			// var sort = $('[name="sorting"]').val();
			filterload_();
			// var x = document.getElementById("more");
			// x.style.display="none";
			//var pageno = $(this).attr('data-ci-pagination-page');
			//loadPagination(pageno);
		})

		function filterload_()
		{
			//var sort = $('[name="sorting"]').val();
			loadPagination(0);
			$('.pagination').on('click','a',function(e){
				e.preventDefault();
				var pageno = $(this).attr('data-ci-pagination-page');
				loadPagination(pageno);
			});
			
		}

		function loadSort(id)
		{
			$('[name="filter"]').val(0);
			filterload_();
		}

		// document.getElementById('sorting').addEventListener('change', onchange);

		function loadPagination(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadBlogRecord/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						isiBlog(response.result,response.row);
					}
			});
		}

        function isiBlog(res,sno)
        {
        	$('#blog_content').empty();
        	moment.updateLocale('id', {
										    months : [
										        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
										        "Agustus", "September", "Oktober", "November", "Desember"
										    ]
										});
			moment.locale('id');
			// alert(moment.locale());
        	for(index in res)
			{
				var label ='Posted on '+res[index].BLOG_DATE;
				var readless = limitWords(res[index].BLOG_CONTENT,50);
				var readmore = res[index].BLOG_CONTENT;
				var div1='<h2><a href="<?php echo base_url()?>Blogpost/read/'+res[index].BLOG_ID+'"?>'+res[index].BLOG_TITLE +'</a></h2><hr />';
				var tgl = moment(res[index].BLOG_DATE).format('DD MMMM YYYY');
				// var tgl = '11 Oktober 2018';
				var div2='<p><span class="glyphicon glyphicon-time"></span> Posted on '+ tgl +'</p>';
				var div3='<img class="img-responsive" src="<?php echo base_url();?>admin/assets/img/blogpost/'+res[index].BLOG_PICTURE+'?>" width="800" height="300"alt=""><hr />';
				var div4='<p><div id="less'+res[index].BLOG_ID+'">'+readless+'</div></p>';
				var div5='<p><div id="more'+res[index].BLOG_ID+'" style="display:none">'+readmore+'</div></p>';
				// var div5='<a class="btn btn-primary" href=<?php //echo base_url();?>Blogpost/read/'+res[index].BLOG_ID+'>Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
				var div6='<input type="button" id="readmore'+res[index].BLOG_ID+'" onclick="readmore('+res[index].BLOG_ID+')" value="Read More"></input>';
				var div = '<div>'+div1+div2+div3+div4+div5+div6+'</div>'
				$('#blog_content').append(div);		
				// $("button").click(function() {
				// 					    var fired_button = $(this).val();
				// 					    // alert(fired_button);
				// 					    readmore(more);
				// 					});
				// alert(limitWords(res[index].BLOG_CONTENT,50));				
			}
        }

        function limitWords(textToLimit, wordLimit){
			var finalText = "";

			var text2 = textToLimit.replace(/\s+/g, ' ' );

			var text3 = text2.split(' ');

			var numberOfWords = text3.length;

			var i=0;

			if(numberOfWords > wordLimit)
			{
				for(i=0; i< wordLimit; i++)
				finalText = finalText+" "+ text3[i]+" ";

				return finalText+"...";
			}
			else return textToLimit;
		}

		function readmore(id){
			var readmore="readmore"+id;
			var more="more"+id;
			var less="less"+id;
			if (document.getElementById(readmore).value == "Read More") {
				document.getElementById(readmore).value = "Read Less";
				document.getElementById(more).style.display = "block";
				document.getElementById(less).style.display = "none";
				// $('#dot').empty();
				// document.getElementById("dot").textContent= more;
				// jQuery("#dot").text("Helo");
			}else {
				document.getElementById(readmore).value = "Read More";
				document.getElementById(less).style.display = "block";
				document.getElementById(more).style.display = "none";
				// $('#dot').empty();
				// document.getElementById("dot").textContent= limitWords(more,50);
		    }
			

		}

        function pickTgl(tgl){
        	$.ajax({
					url: '<?=base_url()?>Pagination/ajax_picktgl/'+tgl,
					type: 'get',
					dataType: 'json',
					success: function(data)
					{  
						return data.tgl;
					}
			});
        }

		function cart(id)
		{			
			var prodName = $(id).parent().parent().parent().find('.block2-name').html();
			swal(prodName, "is added to cart !", "success");
		}

		function wishlist(id)
		{
			var nameProduct = $(id).parent().parent().parent().find('.block2-name').html();			
			swal(nameProduct, "is added to wishlist !", "success");
		}
		
		function filter_()
		{
			var ctg = $('[name="categories"]').val();
			var loc = $('[name="location"]').val();
			var size = $('[name="size"]').val();
			$('[name="filter"]').val(1);
			$('[name="ctg"]').val(ctg);
			$('[name="loc"]').val(loc);
			$('[name="siz"]').val(size);
			filterload_();
		}
	</script>