import React from 'react'
import Navigation from './Navigation/Navigation'
import { Provider } from 'react-redux'
import Store from './Store/configureStore'
import {StatusBar, View, StyleSheet } from 'react-native'
import SplashScreen from 'react-native-splash-screen';


export default class App extends React.Component {
  componentDidMount() {
  SplashScreen.hide()
}
  render() {
    return (
        <Provider store={Store}>
          <View style={styles.main_container}>
            <StatusBar backgroundColor="#232531" barStyle="light-content"/>
            <Navigation/>
            </View>
        </Provider>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531'
  }
})
