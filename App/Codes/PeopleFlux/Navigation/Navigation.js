import React from 'react';
import { Ionicons, AntDesign, MaterialIcons } from '@expo/vector-icons'
import { StyleSheet, Text, View, TouchableOpacity } from 'react-native';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';
import { createDrawerNavigator, DrawerActions } from 'react-navigation-drawer';
import APropos from '../Components/APropos'
import Contact from '../Components/Contact'
import Lieux from '../Components/Lieux.js'
import Calendrier from '../Components/Calendrier.js'
import EventDetail from '../Components/EventDetail.js'




const DrawerNavigator = createDrawerNavigator({
  APropos: {
    screen: APropos,
    navigationOptions: ({ navigation }) => ({
      title: 'APropos Screen',
      drawerLabel: 'A Propos',
      drawerIcon: () => <AntDesign name="team" size={20} color='#fff' />
    })
  },
  Contact: {
    screen: Contact,
    navigationOptions: ({ navigation }) => ({
      title: 'Contact Screen',
      drawerLabel: 'Contact',
      drawerIcon: () => <AntDesign name="contacts" size={20} color='#fff' />



    })
  },
    Lieux: {
      screen: Lieux,
      navigationOptions: ({ navigation }) => ({
        title: 'Lieux Screen',
        drawerLabel: 'Lieux',
        drawerIcon: () => <MaterialIcons name="place" size={20} color='#fff' />

      })
    },
    Calendrier: {
      screen: Calendrier,
      navigationOptions: ({ navigation }) => ({
        title: 'Calendrier Screen',
        drawerLabel: 'Calendrier',
        drawerIcon: () => <AntDesign name="calendar" size={20} color='#fff' />

      })
    }


},
  {
    drawerPosition: 'right',
    drawerType: 'slide',
    drawerBackgroundColor: '#232531',
    drawerWidth: 170,
    contentOptions:{
      activeTintColor: '#c70039',
      inactiveTintColor: '#fff',
      activeBackgroundColor :'#4B4C56',

    }
  }
);


const StackNavigator = createStackNavigator({
  DrawerNavigator: {
    screen: DrawerNavigator,
    navigationOptions: ({ navigation }) => {
      const { state } = navigation;


        return {
          header: ({titleStyle}) =>(
              <View style={styles.main_container}>
                <View style={styles.title_container}>
                  <Text style={styles.title_text_people}>People</Text><Text style={styles.title_text_flux}>Flux</Text>
                  <TouchableOpacity style={styles.menuOpen} onPress={() => {navigation.dispatch(DrawerActions.toggleDrawer())}}>
                    <Ionicons name="ios-menu"  size={50} color='#fff' />
                  </TouchableOpacity>
                </View>
              </View>


          )

        }

    }
  },
  EventDetail: {
    screen: EventDetail,
    navigationOptions: ({ navigation }) => {
      const { state } = navigation;


        return {
          header: ({titleStyle}) =>(
              <View style={styles.main_container}>
                <View style={styles.title_container}>
                  <TouchableOpacity style={styles.back} onPress={() => navigation.navigate("Calendrier")}>
                    <Ionicons name="ios-arrow-round-back"  size={50} color='#ff5733' />
                  </TouchableOpacity>
                  <Text style={styles.title_text_people}>People</Text><Text style={styles.title_text_flux}>Flux</Text>
                </View>
              </View>
          )
        }
      }
  }
})


const styles = StyleSheet.create({

  main_container:{
    backgroundColor: '#232531'
  },
  title_container:{
    marginTop : 30,
    flexDirection:'row',
    textAlign:'center',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#232531'

  },
  title_text_people: {
    color:'white',
    fontSize:30,


  },
  title_text_flux:{
    color:'#ff5733',
    fontSize:30,


  },
  menuOpen: {
    backgroundColor: '#232531',
    position: 'absolute',
    right: 20
  },
  back:{
    backgroundColor: '#232531',
    position: 'absolute',
    left: 20
  }
});

export default createAppContainer(StackNavigator);
