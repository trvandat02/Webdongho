$(document).ready(function(){
	$('#register_form').validate({
		rules: {
			username: {required: true, minlength: 5},
			password: {required: true, minlength: 5, maxlength: 8},
			confirmpassword: {
				required: true,
				minlength: 5,
				maxlength: 8,
				equalTo: '#password',
			},
			name: { required: true, minlength: 1},
			email: { required: true, email: true},
			phone: { required: true, minlength: 10},
		},
		messages: {
			username: {
				required: 'Bạn chưa nhập vào tên đăng nhập',
				minlength: 'Tên đăng nhập phải có ít nhất 5 ký tự',
			},
			password: {
				required: 'Bạn chưa nhập mật khẩu',
				minlength: 'Mật khẩu phải có ít nhất 5 ký tự',
				maxlength: 'Mật khẩu tối đa 8 ký tự',
			},
			confirmpassword: {
				required: 'Bạn chưa nhập mật khẩu',
				minlength: 'Mật khẩu phải có ít nhất 5 ký tự',
				maxlength: 'Mật khẩu tối đa 8 ký tự',
				equalTo:
					'Mật khẩu không trùng khớp với mật khẩu đã nhập',
			},
			name: {
				required: 'Bạn chưa nhập họ tên',
				minlength: 'Tên phải ít nhất 1 ký tự',
			},
			email: {
				required: 'Bạn chưa nhập email',
				email: 'Email không hợp lệ',
			},
			phone: {
				required: 'Bạn chưa nhập số điện thoại',
				minlength: 'Số điện thoại không hợp lệ',
			}
		},
		errorElement: 'div',
		errorPlacement: function(error, element){
			error.addClass('invalid-feedback');
			error.insertAfter(element);
		},
		highlight: function(element, errorClass, validClass){
			$(element)
				.addClass('is-invalid')
				.removeClass('is-valid');
		},
		unhighlight: function(element, errorClass, validClass){
			$(element)
				.addClass('is-valid')
				.removeClass('is-invalid');
		},
	});
});