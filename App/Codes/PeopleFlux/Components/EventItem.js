import React from 'react'
import { StyleSheet, View, Text, Platform, TouchableOpacity } from 'react-native'
import EventDetail from './EventDetail'


class EventItem extends React.Component {



  render() {
    const evenement=this.props.event
    const displayDetail = this.props.displayDetail

    return (
          <View style={styles.main_container}>
            <TouchableOpacity
              onPress={() => displayDetail(evenement.name, evenement.date, evenement.lieu, evenement.description)}
            >
              <View style={styles.bordure}>
                <View style={styles.event_date}>
                  <View style={styles.name_lieu}>
                    <View style={styles.name_container}>
                      <Text style={styles.text_event}>{evenement.name}</Text>
                    </View>
                    <View style={styles.lieu_container}>
                      <Text style={styles.text_lieu}>{evenement.lieu}</Text>
                    </View>
                  </View>
                  <Text style={styles.text_date}>{evenement.date}</Text>
                </View>

              </View>
            </TouchableOpacity>
          </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',

  },
  text_calendrier:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10,
  },

  bordure:{
    borderColor: '#4B4C56',
    marginTop: 15,
    marginLeft:6,
    marginRight:6,
    borderRadius:30,
    backgroundColor: '#4B4C56',
    justifyContent: 'center'

  },
  event_date:{
    flexDirection:'row',
    alignItems: 'center'

  },
  text_event:{
    width: 130,
    fontWeight : 'bold',
    fontSize: 25,
    color: '#ff5733',
    marginLeft: 5,
    textAlign: 'center'
  },

  text_date:{
    fontSize: 15,
    color: '#fff',
    marginLeft: 50,
    position: 'absolute',
    right: 20,

  },
  text_lieu:{
    fontSize: 10,
    color: '#fff',
    marginLeft: 5,
    marginBottom: 5,
  },
  lieu_container:{
    alignItems: 'center'
  },

  name_container:{
  },
  name_lieu:{
    marginTop: 5
  }
})

export default EventItem
