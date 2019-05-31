eventListeners();

function eventListeners(){
    document.querySelector('#form').addEventListener('submit', confirmRegistration);
}

function confirmRegistration(e){
    e.preventDefault();

    var user = document.querySelector('#user').value.trim(),
        password = document.querySelector('#password').value.trim(),
        type = document.querySelector('#type').value;
    
    if(user === '' || password === ''){
        // This is for the alert plugin.
        // When validation fails:
        Swal.fire({
            type: 'error',
            title: 'Error!',
            text: 'Both fields are required!',
        })
    }else{
       // When both fields are correct, execute AJAX

        //Data that is sent to the server:
        var data = new FormData();
        data.append('user', user);
        data.append('password', password);
        data.append('action', type);
        // console.log(data.get('user')); 


        // Call to AJAX
        var xhr = new XMLHttpRequest();

        // open connection
        xhr.open('POST', 'inc/model/admin-model.php', true);

        // data return
        xhr.onload = function(){
            if(this.status === 200){
                //console.log(JSON.parse(xhr.responseText));
                var answer = JSON.parse(xhr.responseText);
                
                if(answer.answer === 'correct'){
                    if(answer.type === 'create'){
                        swal({
                            title: 'Correct!',
                            text: 'User created successfully',
                            type: 'success'
                        });
                    }else if(answer.type === 'login'){
                        swal({
                            title: 'Correct login!',
                            text: 'Press OK to open dashbord',
                            type: 'success'
                        })
                        .then(function(result){
                            if(result.value){
                                window.location.href = 'index.php';
                            }
                        })
                    }
                } 
                else if(answer.answer === 'errorUser'){
                    // Error
                    swal({
                        title: 'Error!',
                        text: "User doesn't exist",
                        type: 'error'
                    });
                }else if(answer.answer === 'incorrectPassword'){
                    // Error
                    swal({
                        title: 'Error!',
                        text: "Incorrect password, try again!",
                        type: 'error'
                    });
                }
            }
        }

        //send request 
        xhr.send(data);

    }
}