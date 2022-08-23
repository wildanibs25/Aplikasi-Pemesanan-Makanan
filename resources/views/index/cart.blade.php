<table class="table" id="table">
    <tbody>
        @foreach($item as $i)
        {{-- @if($i->user_id == Auth::id()) --}}
        <tr>
            <td>
                <img src="../gambarMenu/{{ $i->gambar_menu }}" 
                style="width:40px !important; height:40px !important; object-fit:cover;" alt="">
            </td>
            <td class="quantity">
                <input type="text" disabled value="{{ $i->nama_menu }}">
            </td>
            <td class="quantity">
                <input type="text" disabled value="@currency($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100))">
            </td>
            <td class="quantity2">
                <input id="myqty" type="number" name="qty" style="width: 70px" min="1" max="99" step="1" value="{{ $i->qty }}" onchange="qtycart('{{ $i->id_item }}', this.value)" />
            </td>
            <td><a href="javascript:void(0)" class="btn btn-danger" onclick="deleteItem('{{ $i->id_item }}')">X</a></td>
        </tr>
        {{-- @endif --}}
        @endforeach
    </tbody>
</table>

<script>
    jQuery('<div class="quantity2-nav"><div class="quantity2-button quantity2-up">+</div><div class="quantity2-button quantity2-down">-</div></div>').insertAfter('.quantity2 input');
    jQuery('.quantity2').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity2-up'),
        btnDown = spinner.find('.quantity2-down'),
        min = input.attr('min'),
        max = input.attr('max');
      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });
      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });
    });
</script>

<script>
  function qtycart(id_item, qty){
    var data={
          'id_item': id_item,
          'qty':qty,
      }
      $.post(
        '{{ url("cartQty") }}',
          JSON.stringify(data),
          function(res){
            // alert('oke')
          },
          "JSON",
      )
  }
</script>
