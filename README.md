# phpAssignmet
Assignment 3: A Database-Driven Website
1. Assignment Aims
This assignment is intended to allow you to demonstrate your ability to develop a simple
database-driven website. The site will extract data from a relational database and will
render it in HTML format so that it can be viewed in a web browser.
2. Learning Outcomes:
 Analyse the well-established principles of transaction processing in the provision of
concurrent access/control and database recovery.
 Design, build, verify and maintain a relational database for a given requirement
specification.
 Navigate a relational database using both SQL and a graphical user interface.
 Integrate a relational database with the Web with appropriate protocols and
scripting.
3. Assessment Brief
You will find on Brightspace five SQL scripts that create a database for the famous
Poppleton Dog Show. You are familiar with this application from the tutorial sessions, and
from the SQL Quiz.
Select the file that corresponds to your surname, and take a copy. (The databases generated
are identical in structure but load different data. The data is randomly generated.)
Load the data into the installation of MySQL that is most convenient to you. You may use
Selene, or you could use your own installation, via XAMPP (recommended). Examine the
database if you need to refresh your memory.
The requirements for the website are as follows. Note that there is no need to pay attention
to styling (although you are welcome to do so if you want) – basic HTML formatting is fine.
You are expected to use PHP and MySQL to achieve the following. Do not use any
framework, even if it would help. If you do not understand this sentence, ignore it!
 The page should display a header (H1) and below it the message:
“Welcome to Poppleton Dog Show! This year xx owners entered yy dogs in zz
events!”.
You should replace xx, yy, zz with the correct values found by running SQL queries
against the database.
 Add below a list that displays the top ten dogs in the show. This is defined as the ten
dogs who have the highest average scores, provided they have entered more than
one event. Display just the dog’s name, breed, and average score.
 Next to each dog, add the name of the owner and the owner’s email address. The
email address link should start up the default email application to send an email to
6
the owner. The owner’s name should link to a second page containing the owner’s
contact details.
You are welcome to add any other features you wish to your site. A picture of the owner,
maybe.
Now use screenshots to document your site and to show how everything works. Include a
very brief description of the environment you have used (XAMPP or Selene, for example).
Import your program code into your word processor, and format it neatly using a non-
proportional font.
Collate these two into a single document and submit it as PDF. Submit also a zip file of your
code.
