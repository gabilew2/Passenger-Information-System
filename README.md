# announcement-system
Announcement system (Passenger Information System) for the people transport companies. This software is still inder construction.

## Dependences
* Qt 5.12 (or higher)
* ~~GPS signal receiver~~ (to implement)

## Install and configure QT 5.12
Download and run `qt-opensource-windows-x86-5.12.12.exe` from https://download.qt.io/archive/qt/5.12/5.12.12/qt-opensource-windows-x86-5.12.12.exe.<br>
Install all except C++ compilers, choose only one (`mingw` is recommended). If the Qt account is needed, then turn off the Internet connection and restart installer. <br>
After the installation process is complete, go to the root folder of the project and run the file `AnnouncementSystem.pro`. Then press `configure`. This will create a `.pro.user` file that is only for you. <br>

## How to build project?
Compiling in Qt Creator is similar to other IDEs. Please press the `Build` button each time. <br>
For some reason, after running the application in the Qt environment, the functions based on loading data files do not work. <br>
In order to run the application correctly, please go to the `build-...` directory in the directory preceding the main project directory. <br>
Now copy some files from the main project directory and from the root directory of the Qt framework. <br>
```
announcement-system/route.txt
announcement-system/dot1.png
announcement-system/dot2.png
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\libgcc_s_seh-1.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\libstdc++-6.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\libwinpthread-1.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\Qt5Cored.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\Qt5Guid.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\Qt5Positioningd.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\Qt5TextToSpeechd.dll
C:\Qt\Qt5.12.12\5.12.12\mingw73_64\bin\Qt5Widgetsd.dll
```
Now run the executable `AnnouncementSystem.exe`.
