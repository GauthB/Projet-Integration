import React from 'react';
import { Ionicons } from '@expo/vector-icons'
import { StyleSheet, Text, View, TouchableOpacity } from 'react-native';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';
import { createDrawerNavigator, DrawerActions } from 'react-navigation-drawer';
import APropos from '../Components/APropos'
import Contact from '../Components/Contact'
import Lieux from '../Components/Lieux.js'
import Calendrier from '../Components/Calendrier.js'



const DrawerNavigator = createDrawerNavigator({
  APropos: {
    screen: APropos,
    navigationOptions: ({ navigation }) => ({
      title: 'APropos Screen',
      drawerLabel: 'A Propos',
    })
  },
  Contact: {
    screen: Contact,
    navigationOptions: ({ navigation }) => ({
      title: 'Contact Screen',
      drawerLabel: 'Contact',

    })
  },
    Lieux: {
      screen: Lieux,
      navigationOptions: ({ navigation }) => ({
        title: 'Lieux Screen',
        drawerLabel: 'Lieux',
      })
    },
    Calendrier: {
      screen: Calendrier,
      navigationOptions: ({ navigation }) => ({
        title: 'Calendrier Screen',
        drawerLabel: 'Calendrier',
      })
    }

},
  {
    drawerPosition: 'right',
    drawerType: 'slide',
    drawerBackgroundColor: '#232531',
    drawerWidth: 150,
    contentOptions:{
      activeTintColor: '#c70039',
      inactiveTintColor: '#fff'
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

                <View style={styles.title_container}>
                  <Text style={styles.title_text_people}>People</Text><Text style={styles.title_text_flux}>Flux</Text>
                  <TouchableOpacity onPress={() => {navigation.dispatch(DrawerActions.toggleDrawer())}}>
                    <Ionicons name="ios-menu" style={styles.menuOpen} size={40} color='#fff' />
                  </TouchableOpacity>
                </View>


          )

        }

    }
  }
})


const styles = StyleSheet.create({

  title_container:{
    flexDirection:'row',
    textAlign:'center',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#232531'

  },
  title_text_people: {
    marginTop:30,
    color:'white',
    fontSize:30,
    borderLeftWidth: 55


  },
  title_text_flux:{
    marginTop:30,
    color:'#ff5733',
    fontSize:30,
    borderRightWidth: 55

  },
  menuOpen: {
    marginTop: 30,
    backgroundColor: '#232531'
  }
});

export default createAppContainer(StackNavigator);
