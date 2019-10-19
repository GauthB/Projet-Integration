import React from 'react'
import { StyleSheet, View, Text } from 'react-native'
import eventData from '../Helpers/EventData'

class EventDetail extends React.Component {

  render(){
    const evenement=this.props.event

    return(
      <View style={styles.main_container}>
        <Text>{evenement.description}</Text>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',
  }
})
export default EventDetail
