blergMVC
========

Just practicing PHP by creating my own MVC framework.  It's not something I want to seriously promote and distribute so use at your own risk.

Right now there's no Model part of the MVC, so it's just really just VC

This is a simple MVC framework meant for small sites were you still wanted to use some of the things that an MVC framework offers like View layouts and such. The one key thing about this framework is that you don't necessarily need to define an action method in the controller, or even a controller, for every route.  This can be useful for static pages with no dynamic data being pulled from a DB.

example1    
for index action routes like this: www.your-site.com/something
- looks for the controller: **somethingController**, and looks for the method: **index**
- if that method or controller is not defined, it will still try and render: 'views/something/index.php'
- if that file doesn't exist, it will look for 'views/something.php'
- finally you get a 404 if none of those are found

example2:  
for defined actions like this: www.your-site.com/something/else
- looks for the controller: **somethingController**, and looks for the method: **else**
- if that method or controller is not defined, it will still look for:  'views/something/else.php'
- you get a 404 if none of those are found

My main reason was that I didn't want to have to create a subfolder/index.php just for every single page. This is not perfect, I'm still tweaking this or just might scrap this part altogether and just deal with having subfolders.