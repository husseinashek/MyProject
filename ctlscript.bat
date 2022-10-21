@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist C:\Users\Admin\Desktop\New folder\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\server\hsql-sample-database\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\ingres\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\ingres\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\mysql\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\mysql\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\postgresql\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\apache\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\apache\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\openoffice\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\apache-tomcat\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\apache-tomcat\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\resin\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\resin\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\jetty\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\jetty\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\subversion\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist C:\Users\Admin\Desktop\New folder\lucene\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\lucene\scripts\ctl.bat START)
if exist C:\Users\Admin\Desktop\New folder\third_application\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist C:\Users\Admin\Desktop\New folder\third_application\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\third_application\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\lucene\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist C:\Users\Admin\Desktop\New folder\subversion\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\subversion\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\jetty\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\jetty\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\resin\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\resin\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT C:\Users\Admin\Desktop\New folder\apache-tomcat\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\openoffice\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\apache\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\apache\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\ingres\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\ingres\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\mysql\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\mysql\scripts\ctl.bat STOP)
if exist C:\Users\Admin\Desktop\New folder\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\Admin\Desktop\New folder\postgresql\scripts\ctl.bat STOP)

:end

