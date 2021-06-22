 
  	$(document).ready(function()
    {
      showtable();
      count_item();

  		$(".btn_add").click(function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var photo = $(this).data('photo');

        var item ={id:id,name:name,price:price,photo,photo,qty:1};

  			// alert ('hello');
  			var mycart = localStorage.getItem('mycart');
  			if(!mycart)
  			{
  				mycart = '{"Itemlist":[]}';
  			}
  			var mycartobj = JSON.parse(mycart);
        var hasid = false;
        $.each(mycartobj.Itemlist,function(i,v)
        {
          if(v.id == id)
          {
            hasid = true;
            v.qty++;
          }
        })
        if(!hasid)
        {
          mycartobj.Itemlist.push(item);
        }
        // console.log(mycartobj);
          localStorage.setItem('mycart',JSON.stringify(mycartobj));
          count_item();

  		})


      function count_item()
      {
        var mycart = localStorage.getItem('mycart');
        var total = 0;
        if(mycart)
        {
        var mycartobj = JSON.parse(mycart);
        $.each(mycartobj.Itemlist,function(i,v)
        {
          total+=v.qty;
        // console.log(total);
        })
        
        $('.count_num').html(total);

        }

      }

      function showtable()
      {
        var mycart = localStorage.getItem('mycart');
        if(mycart)
        {
          var html="";
          var tfoot="";
          var j=1;
          var total = 0;
          var subtotal = 0;
          var totalamount = 0;
          var mycartobj = JSON.parse(mycart);
          $.each(mycartobj.Itemlist,function(i,v)
          {

            var  name = v.name;
            var photo = v.photo;
            // console.log(photo);
            var price = v.price;
            var qty = v.qty;
            total = qty*price;
            subtotal+=total;
            totalamount = subtotal+25;
            html+='<tr><td>'+j+'</td><td><img src="'+photo+'" class="img-fluid" width="100px"></td><td>'+name+
                  '</td><td>'+price+'</td><td><input type="number" class="form-control chnage_qty" data-id='+i+' value='+qty+'>'+
                  '</td><td>'+total+'</td><td><button class="btn btn-danger btn_delete" data-id='+i+' ><i class="fas fa-trash "></i></button>';
                  j++;
          })

          tfoot+= '<tr>'+
                  '<td colspan="4"></td>'+
                  '<td>Subtotal</td>'+
                  '<td>'+subtotal+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td colspan="4"></td>'+
                  '<td>Tax</td>'+
                  '<td>5%</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td colspan="4"></td>'+
                  '<td class="text-danger font-weight-bold">Total Amount</td>'+
                  '<td class="text-danger font-weight-bold">'+totalamount+'</td>'+
                  '</tr>';

            $('#show_body').html(html);
            $('#show_footer').html(tfoot);
        }
      }

      $('tbody').on('click','.btn_delete',function(){
        var id = $(this).data('id');
        var localstorageitem = localStorage.getItem('mycart');

        var localstorageitem = JSON.parse(localstorageitem);
        var mycart = localstorageitem.Itemlist;
        
        $.each(mycart,function (i,v) 
        {
          if (i == id) 
          {
            mycart.splice(id,1);
          }
        })
        
        cart = JSON.stringify(localstorageitem);
        localStorage.setItem('mycart',cart);
        showtable();
        count_item();
      })

      $('tbody').on('change','.chnage_qty',function(){
        var id = $(this).data('id');
        var value = $(this).val();
        var qty = parseInt(value);
        // console.log(value);
        var mycart = localStorage.getItem('mycart');
        if(mycart)
        {
          var mycartobj = JSON.parse(mycart);
          $.each(mycartobj.Itemlist,function(i,v)
            {
              // console.log(i);
              if(i==id)
              {
                // var qty = 0;
                // var qty = mycartobj.Itemlist[id].qty;
                // console.log(qty);
                // qty=value;
                mycartobj.Itemlist[id].qty=qty;

              }
                if(value==0)
                {
                  mycartobj.Itemlist.splice(id,1);
                }
              

              localStorage.setItem('mycart',JSON.stringify(mycartobj));
              showtable();
              count_item();
            });
          
        }
      })


      $('.check').on('click','.order',function(){
        // console.log('helo');
        // alert('hello');
        // alert("Your orders are Confirm!!");
        var noti = $('.noti').val();
        // console.log(noti);
        var mycart = localStorage.getItem('mycart');
        if(mycart)
        {
          var mycartobj = JSON.parse(mycart);
          var mycartarr = mycartobj.Itemlist;
          $.post('order_store.php',{noti:noti,mycartarr:mycartarr},function(response){
          // console.log(response);
          
          alert("Your orders are Confirm!!");
          
          localStorage.clear('mycart.Itemlist');
          window.location.href='index.php';
          
        })

        }
        
      })


      

  	})
  