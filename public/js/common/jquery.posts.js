jQuery(document).ready(function($){
    
        $('#formPosts').validate({
            
            rules:{
                titulo:{required:true},
                texto:{required:true}
            },
            messages:{
                titulo:{
                    required:'É necessario o titulo do post'
                },
                texto:{
                    required:'É necessario o texto do post'
                }
            }
        });
 });

