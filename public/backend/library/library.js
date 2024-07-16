(function ($) {
    "use strict";
    var HT = {};
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // ====================
    // #Switch Button
    // ====================

    HT.switchery = () => {
        $('.js-switch').each(function () {
            // let _this  = $(this)
            var switchery = new Switchery(this, {color: '#1AB394', size: 'small'});
        })
    }

    // ====================
    //Select 2
    // ====================

    HT.select2 = () => {
        if($('.setupSelect2').length) {
            $('.setupSelect2').select2();
        }
    }

    // ====================
    // Change status
    // ====================

    HT.changeStatus = () =>{
            $(document).on('change','.status',function (e){
                let _this  = $(this)
                let option = {
                    'value' : _this.val(),
                    'modelId': _this.attr('data-modelId'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    'role': _this.attr('role'),
                    '_token': csrfToken,
                }
                if (option.role === 'admin') {
                    alert('Không thể thay đổi trạng thái của tài khoản admin.');
                    _this.prop('checked', !_this.is(':checked'));
                    return false;
                }
                $.ajax({
                    //url: 'ajax/dashboard/changeStatus',
                    url: $(this).data('href'),
                    type: 'POST',
                    data: option,
                    dataType: 'json',

                    success: function (res) {
                        let inputValue = ((option.value == 1 )?2:1)
                        if(res.flag==true){
                            _this.val(inputValue)
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
                console.log(option)
                e.preventDefault()
            })

    }

    HT.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function (e) {
                let _this = $(this)
                let id = []
                let adminIds = ['1'];
                $('.checkBoxItem').each(function () {
                    let checkBox = $(this)
                    if (checkBox.prop('checked')) {
                        id.push(checkBox.val())
                    }
                })

                for (let i = 0; i < id.length; i++) {
                    if (adminIds.includes(id[i])) {
                        alert('Không thể thay đổi trạng thái của tài khoản admin.');
                         return false;
                    }
                }

                let option = {
                    'value': _this.attr('data-value'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    'id':id,
                    '_token': csrfToken,
                }

                console.log(option)


                $.ajax({
                    url: 'ajax/dashboard/changeStatusAll',
                    type: 'POST',
                    data: option,
                    dataType: 'json',

                    success: function (res) {
                        if(res.flag == true ){
                            let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;'
                            let cssActive2 = 'left: 14px;background-color: rgb(255,255,255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s'
                            let cssUnActive1 = 'box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;'
                            let cssUnActive2 = 'left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;';

                            for(let i=0 ; i < id.length; i++){
                                if(option.value == 2){
                                    console.log('value')
                                    $('.js-switch-'+id[i]).find('span.switchery')
                                        .attr('style',cssActive1)
                                        .find('small')
                                        .attr('style',cssActive2)
                                }else if(option.value == 1){
                                    $('.js-switch-'+id[i]).find('span.switchery')
                                        .attr('style',cssUnActive1)
                                        .find('small')
                                        .attr('style',cssUnActive2)
                                 }
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });

                e.preventDefault()
            })
        }
    }

        // ====================
        // Check box
        // ====================

        HT.checkAll = () => {
            if ($('#checkAll').length) {
                $(document).on('click', '#checkAll', function () {
                    let isChecked = $(this).prop('checked')

                    $('.checkBoxItem').prop('checked', isChecked)
                    $('.checkBoxItem').each(function () {
                        let _this = $(this)
                        HT.changeBackground(_this)
                    })
                })
            }
        }

        HT.checkBoxItem = () => {
            if ($('.checkBoxItem').length) {
                $(document).on('click', '.checkBoxItem', function () {
                    let _this = $(this)
                    HT.changeBackground(_this)
                    HT.allChecked()
                })
            }
        }

        HT.changeBackground = (object) => {
            let isChecked = object.prop('checked')
            if (isChecked) {
                object.closest('tr').addClass('active-bg')
            } else {
                object.closest('tr').removeClass('active-bg')
            }
        }

        HT.allChecked = () => {
            let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
            $('#checkAll').prop('checked', allChecked);
        }


        $(document).ready(function () {
            HT.switchery();
            HT.select2();
            HT.changeStatus();
            HT.checkAll();
            HT.checkBoxItem();
            HT.allChecked();
            HT.changeStatusAll()
        });

})(jQuery)
