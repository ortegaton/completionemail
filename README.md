# completionemail
Sends email to assigned teacher when a user completes a course.
Plugin designed minded to meet client's needs. Anyway I post it here (with his permission) so maybe its usefull for someone. 

Pre-requisite:  
There's a customzied user field called ClubCode. It stores the email addres for the teacher who should be notified when the user completes a course.

Configuration:  
There are two configuration strings, otr1_email_subject and otr1_email_message_desc. The sent mail is sent with this subject and message.
On classes/observer.php there are defined constants to specify which courses should activate the sending of the email.

