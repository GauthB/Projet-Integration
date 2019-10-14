import React from 'react'
import { StyleSheet, View, TextInput, Button, Text, SafeAreaView, TouchableOpacity, Image } from 'react-native'

class APropos extends React.Component {
  render() {
    return (
      <SafeAreaView style={styles.main_container}>
        <View style={styles.main_container}>
          <TouchableOpacity style={styles.TouchableOpacity}>
            <Image
            source={require('../Images/PeopleFlux.png')}
            style={styles.icon}/>
          </TouchableOpacity>
        </View>
      </SafeAreaView>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531'
  },
  touchableOpacity: {
    justifyContent: 'center',
    alignItems: 'center'

  },
  icon: {
    justifyContent: 'center',
    alignItems: 'center'
  }
})

export default APropos


// L'alignement du logo ne se fait pas
