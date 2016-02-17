function is_size(val) {
		flag = false;
		if(val != 'Size') flag = true;
	return flag;
}
function is_color(val) {
	return (val != 'Color') ? true : false;
}
function is_qty(val) {
	return (val > 0) ? true : false;
}
function muahang(id, muahang_url) {
	size 	= $('[name="size-'+id+'"] option:selected').text();
	color 	= $('[name="color-'+id+'"] option:selected').text();
	qty		= $('[name="quentity-'+id+'"]').val();
	html = '';
	if(is_size(size) == false) {
		html = '<li>Bạn chưa chọn size cho sản phẩm.</li>';
	}
	
	if(is_color(color) == false) {
		html += '<li>Bạn chưa chọn color cho sản phẩm.</li>';
	}
	
	if(is_qty(qty) == false) {
		html += '<li>Số lượng sản phẩm phải lớn hơn 0 và là số nguyên.</li>';
	}
	if(html != '') {
		$('#error-product').html(html);
		$('#myModal').modal('show');
	} else {
		url = muahang_url + '/' + id + '/' + size + '/' + color + '/' + qty;
		window.location = url;		
	}
};