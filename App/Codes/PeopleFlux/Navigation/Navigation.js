import React from 'react';
import { Ionicons } from '@expo/vector-icons'
import { StyleSheet, Text, View, TouchableOpacity } from 'react-native';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';


import { createDrawerNavigator, DrawerActions } from 'react-navigation-drawer';

import APropos from '../Components/APropos'
import Contact from '../Components/Contact'







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
},
  {
    drawerPosition: 'right',
    drawerOpenRoute: 'DrawerRightOpen',
    drawerType: 'slide',
    drawerBackgroundColor: '#232531',
  }
);


const StackNavigator = createStackNavigator({
  DrawerNavigator: {
    screen: DrawerNavigator,
    navigationOptions: ({ navigation }) => {
      const { state } = navigation;


        return {
          headerLeft: ({titleStyle}) => (
            <View style={styles.container}>
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
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  menuOpen: {
    marginLeft: 10,
    marginTop: 10,
    backgroundColor: '#232531'
  },
  menuClose: {
    marginLeft: 14,
    marginTop: 10,
    backgroundColor: '#232531'

  }
});

export default createAppContainer(StackNavigator);
