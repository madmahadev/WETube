WETube

Database Details:
		1: Database Name:"wetube"
		2:No password to it
		
We should have following table
		1:admin(id,username,password) insert default id andd password using which you want to access
		2: There Are 5 departments pages in websites so
			create table for each department with assigned sub keyword which will store subjects.
			like
			cse_sub(id,subject)
			civil_sub(id,subject)
			electronics_sub(id,subject)
			electrical_sub(id,subject)
			it_sub(id,subject)
			mech_sub(id,sub)
		3:for storing notice create notice table
			notice(id,message,hyperlink,date)
		4:For storing the advertize details create table advimage
			advimage(id,image,hyperlink)
		5:For Storing the messages or feedback from students create table contactus
			contactus(id,name,email,message,date,seen)

Directory Sturucture:
	In the same directory e.g. htdocs there should be following folders
	The file given "wetube directories.rar"
		Extract file and copy all subfolders of "wetube directories" folder to your subdirectory e.g. htdocs
 
		

				 