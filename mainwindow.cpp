// 2022-2023 Gabriel Malanowski
#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "QDateTime"
#include "QTimer"
#include "QTime"
#include <fstream>
#include <QMessageBox>

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    timer = new QTimer(this);
    connect(timer, SIGNAL(timeout()),this,SLOT(updateHour()));
    timer -> start(1000);
    model = new QStandardItemModel(this);
    ui -> label_5 -> setStyleSheet("image: url(logo.png)");

    m_gps = QGeoPositionInfoSource::createDefaultSource(this);
    if (m_gps) {
      connect(m_gps, SIGNAL(positionUpdated(QGeoPositionInfo)), this, SLOT(positionUpdated(QGeoPositionInfo)));
      m_gps->startUpdates();
    }

    m_speech = new QTextToSpeech(this);
    m_speech->say("Witamy na pokładzie autobusu spółki <<NAZWA TWOJEJ FIRMY>>! Dziękujemy za wybór naszej firmy oraz życzymy Państwu miłej podróży.");
    LoadRoute();
    updateNextStation(1);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::updateHour()
{
    QTime time = QTime::currentTime();
    QDateTime date1 = QDateTime::currentDateTime();
    ui -> lcdNumber -> display(time.toString("hh:mm"));
    ui -> label_4 -> setText(date1.toString("dddd, dd MMMM yyyy"));
}

void MainWindow::LoadRoute()
{
    std::ifstream file("route.txt");
    std::string lineS;
    std::getline(file,lineS);
    line = QString::fromStdString(lineS);
    std::getline(file,lineS);
    destination = QString::fromStdString(lineS);
    ui -> label -> setText("Linia: " + line + "     Kierunek: " + destination);
    m_speech -> say("Linia: " + line + " Kierunek: " + destination);
    //QMessageBox::warning(this,"Debug",line);
    unsigned short i = 0;
    while(std::getline(file,lineS))
    {
        if(i == 0)
        {
            model -> appendRow(new QStandardItem(QIcon(":/.img/dot1.png"), QString::fromStdString(lineS)));
            nextStation = QString::fromStdString(lineS);
            i++;
        }
        else
        {
            model -> appendRow(new QStandardItem(QIcon(":/.img/dot2.png"), QString::fromStdString(lineS)));
        }
    }
    ui -> listView -> setModel(model);
}

void MainWindow::updateNextStation(bool parameter)
{
    if(parameter == 0)
    {
        ui -> label_2 -> setText("Następny przystanek:");
    }
    else
    {
        ui -> label_2 -> setText("Przystanek:");
    }
    ui -> label_3 -> setText(nextStation);
    m_speech -> say(ui -> label_2 -> text() + nextStation);
}

void MainWindow::removeStation()
{
    model->removeRow(0);
    model -> item(0,0) -> setIcon(QIcon(":/.img/dot1.png"));
}

//GPS

void MainWindow::positionUpdated(const QGeoPositionInfo &info)
{
    if (!info.isValid()) {
       QMessageBox::critical(this,"Debug","Invalid GPS data");
       QApplication::exit();
    }

    QMessageBox::warning(this,"","test");
}

