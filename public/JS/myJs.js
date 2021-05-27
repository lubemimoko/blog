/*
  CATEGORY
 */
function category(event){
    event.preventDefault();

        let name = document.getElementById('name').value;
        let route = document.getElementById('route').value;
        // let _token = document.getElementsByName('_token').value
        let _token = $('[name=_token]').val();
        // alert(route) 

        
        // headers: {
        //     'X-CSRF-TOKEN': _token
        //     },
        let form = document.getElementById("categoryForm");
        // console.log(form);
        let form_data = new FormData(form);
        
        $.ajax({
        url:route,
        data: form_data,
        method:'POST',
        processData: false,
        contentType: false,
        success:function(res){
            console.log(res);
            if(res.updated_at){
                
                swal({
                    title:"SUCCESS MESSAGE",
                    text:"Records were inserted successfully.",
                    icon:"success",
                    button:"Ok",
                });
                document.getElementById('name').value=""
            }
            
        },
        error: function(res){
            console.log(res.responseJSON.message);
            swal({
                title:"Error Message",
                text:res.responseJSON.message,
                icon:"error",
                button:"Ok",
            })
        }
    });
}


function deleteCat(id, route){
    // event.preventDefault();
    let x = confirm("Are you sure you want to delete this?");
    if(!x){return;}

        $.ajax({
        url:route,
        method:'delete',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            console.log(res);
            if(res ="success"){
                document.getElementById(id).style.display='none';
                swal({
                    title:"SUCCESS MESSAGE",
                    text:"Record was deleted successfully.",
                    icon:"success",
                    button:"Ok",
                });
            }
            
        },
        error: function(res){
            console.log(res.responseJSON.message);
            swal({
                title:"Error Message",
                text:res.responseJSON.message,
                icon:"error",
                button:"Ok",
            })
        }
    });
}




function editCat(cat, route){
    console.log(cat);
    console.log(route);
           
    document.getElementById("name").value=cat.name;
    document.getElementById("id").value=cat.id;
    document.getElementById("route").value=route
}



function editPost(post, route){
    console.log(post);
    console.log(route); 
    let sel = document.getElementById("category");       
    sel.innerHTML = sel.innerHTML.replace('selected="selected"', "");
    
    console.log(document.getElementById("category").innerHTML);
    
    document.getElementById("title").value=post.title;
    document.getElementById("id").value=post.id;
    document.getElementById("route").value=route
    document.getElementById("body").value=post.body;
    document.getElementById("pic").setAttribute("src", post.pic);
    document.getElementById("cat"+post.category).setAttribute("selected", "selected");
}


function updateForm(event){
    event.preventDefault();

    let id = document.getElementById("id").value;
    // console.log(id);

    let form = document.getElementById("categoryForm2");
    
    let route = document.getElementById("route").value;

    console.log(route);
    // return;console.log(form); 
    let form_data = new FormData(form);
    
    // form_data.append("nanme", name);

    $.ajax({
        url: route,
        method: 'post',
        data: form_data,
        contentType: false,
        processData:false,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            console.log(res);
            if(res.updated_at){
                $("#myModal").modal("hide");
                updateUi(res, route);
                swal({
                    title:"SUCCESS MESSAGE",
                    text:"Record was Updated successfully.",
                    icon:"success",
                    button:"Ok",
                });
              }
            }, 
            error: function(res){
                console.log(res);
                console.log(res.responseJSON.message ?? res);
                swal({
                    title:"Error Message",
                    text:res.responseJSON.message ?? res,
                    icon:"error",
                    button:"Ok",
                })
            }
    });

    
}

function updateUi(res, route){
    if(res.name){
        document.getElementById("cat"+res.id).innerText=res.name;
        
    }else if(res.title){
        document.getElementById("title"+res.id).innerText=res.title;
        document.getElementById("body"+res.id).innerText=res.body;
        document.getElementById("pic"+res.id).src=res.pic;

        let onclick = `{ "id":${res.id}, "title":"${res.title}", "category":"${res.category}","body":"${res.body}", "image":"${res.pic}"}`

        document.getElementById("mod"+res.id).setAttribute("onclick", "editPost("+JSON.stringify(res)+", 'http://127.0.0.1:8000/post/"+res.id+"')");

    }
   return;
}



/*
POST
*/

function insertPost(event){
    event.preventDefault();

    let route = document.getElementById('route').value;
    let form = document.getElementById("postForm");
    let form_data = new FormData(form);
    
    // for(let [name, value] of form_data) {
    //     console.log(`${name} = ${value}`);
    //   }
    
    $.ajax({
        url:route,
        method:"post",
        data:form_data,
        processData: false,
        contentType: false,
        success:function(res){
            console.log(res);
            if(res.updated_at){
                
                let text ="Records were inserted successfully."; 
                if(res.comment && res.comment=="yes"){
                    text = "Comment has been submitted successfully, and it's awaiting admin review"
                }
                swal({
                    title:"SUCCESS MESSAGE",
                    text:text,
                    icon:"success",
                    button:"Ok",
                });
                // let url = window.location;
                setTimeout(()=>{window.location.reload()}, 2000);;
            }
        },

        error:function(res){
            console.log(res.responseJSON.message);
                swal({
                    title:"Error Message",
                    text:res.responseJSON.message,
                    icon:"error",
                    button:"Ok",
                })
        }

    });
}


function previewImage(input){
    var file = $("#imgselect").get(0).files[0]
    console.log("get = ", $("#imgselect").get());
    console.log("files = ", $("#imgselect").get(0).files);
    if(file){
    var reader = new FileReader();
    reader.onload = function(){
        $("#preview").attr('src', reader.result)
        $("#preview").show();
        console.log("reader = ", reader);
    }
    reader.readAsDataURL(file)
    
    }
 }


 function deletePost(route, id, event){
    // event.preventDefault();
    console.log(route, id)
     let x = confirm("Are you sure you want to delete this?");

     if(!x){return;}
     
        $.ajax({
        url:route,
        method:'delete',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            console.log(res);
            if(res ="success"){
                document.getElementById(id).style.display='none';
                swal({
                    title:"SUCCESS MESSAGE",
                    text:"Record was deleted successfully.",
                    icon:"success",
                    button:"Ok",
                });
            }
            
        },
        error: function(res){
            console.log(res.responseJSON.message);
            swal({
                title:"Error Message",
                text:res.responseJSON.message,
                icon:"error",
                button:"Ok",
            })
        }
    });
}


function getRequest(route, event){
    event.preventDefault();
    console.log(route)
        $.ajax({
        url:route,
        method:'get',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            console.log(res);
            if(res ="success"){
                
                swal({
                    title:"SUCCESS MESSAGE",
                    text:"Visibility Change Successfully.",
                    icon:"success",
                    button:"Ok",
                });
            }
            
        },
        error: function(res){
            console.log(res.responseJSON.message);
            swal({
                title:"Error Message",
                text:res.responseJSON.message,
                icon:"error",
                button:"Ok",
            })
        }
    });
}








