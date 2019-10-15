import {createAppContainer} from 'react-navigation'
import {createDrawerNavigator, DrawerActions} from 'react-navigation-drawer';
import {createStackNavigator} from 'react-navigation-stack';
import { Ionicons } from '@expo/vector-icons'


import {StyleSheet, Image} from 'react-native'
import React from 'react'

import APropos from '../Components/APropos'

const AProposStackNavigator = createStackNavigator({
    APropos: {
      screen: APropos,
      navigationOptions: ({ navigation }) => {
        const { state } = navigation;

        if(state.isDrawerOpen) {
          return {
            headerLeft: ({titleStyle}) => (
              <TouchableOpacity onPress={() => {navigation.dispatch(DrawerActions.toggleDrawer())}}>
                <Ionicons name="ios-close" style={styles.menuClose} size={36} color={titleStyle} />
              </TouchableOpacity>
            )
          }
        }
        else {
          return {
            headerLeft: ({titleStyle}) => (
              <TouchableOpacity onPress={() => {navigation.dispatch(DrawerActions.toggleDrawer())}}>
                <Ionicons name="ios-menu" style={styles.menuOpen} size={32} color={titleStyle} />
              </TouchableOpacity>
            )
          }
        }
      }
    }
  })

const DrawerNavigator = createDrawerNavigator({
  APropos: {
    screen: APropos,
    navigationOptions: ({ navigation }) => ({
      title: 'Home Screen',
      drawerLabel: 'Home',
      drawerIcon: () => (
        <Ionicons name="ios-home" size={20} />
      )
    })
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
    marginTop: 10
  },
  menuClose: {
    marginLeft: 14,
    marginTop: 10
  }
});

export default createAppContainer(DrawerNavigator);
