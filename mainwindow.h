#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QStandardItemModel>
#include <QTextToSpeech>
#include <QObject>

#include <QGeoCoordinate>
#include <QGeoLocation>
#include <QGeoPositionInfo>
#include <QGeoPositionInfoSource>
#include <QGeoRoute>


QT_BEGIN_NAMESPACE
namespace Ui { class MainWindow; }
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();
    QString line;
    QString destination;
    QString nextStation;
    QTextToSpeech *m_speech;
    QGeoPositionInfoSource *m_gps;

public slots:
    void updateHour();
    void positionUpdated(const QGeoPositionInfo &info);


private:
    Ui::MainWindow *ui;
    QTimer *timer;
    void LoadRoute();
    QStandardItemModel *model;
    void updateNextStation(bool parameter);
    void removeStation();
};
#endif // MAINWINDOW_H
