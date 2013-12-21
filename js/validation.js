  $(function() {
                $('#datetime').datepicker({
                    duration: '',
                    showTime: true,
                    constrainInput: false
                });                           
                jQuery("#reminderName").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Reminder description"
                });
                jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
                 jQuery("#datetime").validate({
                    expression: "if (!isValidDate(parseInt(VAL.split('/')[2]), parseInt(VAL.split('/')[0]), parseInt(VAL.split('/')[1]))) return false; else return true;",
                    message: "Please enter a valid Date"
                });
            });