$('#filter input[type="checkbox"]').change(function(){
$(this).closest('form').submit();
})