$(document).ready(function() {
	$('input').click(function(event) {
		$(this).removeClass('error');
	});
	
	//phone mask
	$('input[type=tel]').inputmask({'mask':'+38(099)999-99-99'});

	$('#pay__submit').click(function(event) {
		var phone = $('#tel').val(),
				name = $('#name').val(),
				email = $('#email').val(),
				name_status,
				email_status,
				phone_status;

		if (phone!='' && phone.search(/_/i)=='-1') {
			$('#tel').removeClass('error');
			phone_status = true;
		} else {
			$('#tel').addClass('error');
		}

		if (name == '') {
			$('#name').addClass('error');
		}else {
			var pattern = /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u;

			if (pattern.test(name)) {
				$('#name').removeClass('error');
				name_status = true;
			} else {
				$('#name').addClass('error');
			}
		}

		if (email == '') {
			$('#email').addClass('error');
		}else {
			var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

			if (pattern.test(email)) {
				$('#email').removeClass('error');
				email_status = true;
			} else {
				$('#email').addClass('error');
			}
		}

		event.preventDefault();
		if (name_status == email_status == phone_status == true) {
			$.post(
				'wp-admin/admin-ajax.php',
				{
					action: 'create_pay',
					name: $('#name').val(),
					email: $('#email').val(),
					tel: $('#tel').val(),
					amount: $('#price').val()
				}, 
				function(data, textStatus, xhr) {
				data = JSON.parse(data);
				$('#data').val(data['data']);
				$('#signature').val(data['signature']);
				$('.pay__form').submit();
			});
		}
	});
});