// import 'package:flutter/material.dart';
// import 'package:flutter_pusher_client/flutter_pusher.dart';
// import 'package:laravel_echo/laravel_echo.dart';

// class ChatThreadViewModel extends ViewModel {
//   BuildContext _context;
//   FlutterPusher pusher;
//   Echo echo;


//   void init() async {
//       PusherOptions options = PusherOptions(
//         host: '192.168.1.22',
//         port: 6001,
//         cluster: 'mt1',
//         encrypted: true,
//         // auth: PusherAuth(SOCKET_SERVER, headers: {
//         //   'Authorization': "Bearer $token",
//         // }),
//       );

//       try {
//         pusher = FlutterPusher('12345', options, enableLogging: true);

//       }
//       catch(e) {
//         print("socket exception yazan");
//         print(e.errMsg());
//       }
//       echo = new Echo({
//         'broadcaster': 'pusher',
//         'client': pusher,
//       });

//       echo.private('home').listen('NewMessage', (event) {
//         print(event);
//       });
//     }
//   }

//   Future getToken() async {
//     return await SecureStorage.getInstance()
//         .getKey(key: SecureStorage.AUTH_TOKEN);
//   }

//   Future<bool> sendMessage(int toUserId, message, {String type}) async {
//     ChatMessage sentMessage =
//         await this._chatController.sendMessage(toUserId, message, type: type);

//     if (sentMessage != null) {
//       this.messages.insert(0, sentMessage);
//     } else {
//       AppSnackBar.createError(
//           message: this._chatController.message, context: this._context);
//     }

//     notifyListeners();

//     return sentMessage != null;
//     ;
//   }

//   Future getCoordinates() async {
//     Position position = await Geolocator()
//         .getCurrentPosition(desiredAccuracy: LocationAccuracy.high);
//     var coordinates = {
//       'long': position.longitude,
//       'lat': position.latitude,
//     };

//     print(coordinates);
//     return coordinates;
//   }

//   Future<Map<String, dynamic>> shareLocation() async {
//     return await this.getCoordinates();
//   }
// }
