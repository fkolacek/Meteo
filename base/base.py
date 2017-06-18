#!/usr/bin/env python

import sys
#from PyQt4.QtWebKit import QWebView
#from PyQt4.QtCore import QTimer

from PyQt4.QtGui import QApplication
from PyQt4.QtGui import QMainWindow
from PyQt4.QtCore import QUrl
from PyQt4.QtCore import Qt
from PyQt4.QtWebKit import QWebView


BASE_API = "http://127.0.0.1/index.php"

class Window(QMainWindow):

  def __init__(self):
    super(Window, self).__init__()
    self.setGeometry(0, 0, 500, 300)
    self.setWindowTitle("Base client")
    self.setWindowState(Qt.WindowFullScreen)
    #self.setWindowIcon(QtGui.QIcon('pythonlogo.png'))

    self.web = QWebView(self)
    self.web.load(QUrl(BASE_API))
    self.setCentralWidget(self.web)

if __name__ == "__main__":
  app = QApplication(sys.argv)
  window = Window();
  window.show()
  app.exec_()

